
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.config.devtools = process.env.NODE_ENV != 'production';
Vue.config.silent = process.env.NODE_ENV == 'production';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('file-upload',require('./components/FileUpload.vue'));

const app = new Vue({
    el: '#app',

    directives: {
            'autofocus': {
                inserted(el) {
                    el.focus();
                }
            }
    },

    data: {
        image: '',

        files: {},
        file: {},

        pagination: {},
        offset: 5,

        activeTab: 'image',
        isVideo: false,
        loading: false,

        formData: {},
        fileName: '',
        attachment: '',

        editingFile: {},
        deletingFile: {},
        savedFile: {
            type: '',
            name: '',
            extension: ''
        },

        notification: false,
        showConfirm: false,
        modalActive: false,
        message: '',
        errors: {}
    },

    methods: {
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            document.getElementById('filename').innerHTML = file.files[0].name;
            this.createImage(files[0]);
        },

        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        isActive(tabItem) {
            return this.activeTab === tabItem;
        },

        setActive(tabItem) {
            this.activeTab = tabItem;
        },

        isCurrentPage(page) {
            return this.pagination.current_page === page;
        },

        fetchFile(type, page) {
            this.loading = true;
            axios.get('/bijlagen/' + type + '?page=' + page).then(result => {
                this.loading = false;
                this.files = result.data.data.data;
                // console.log(this.files);
                this.pagination = result.data.pagination;
            }).catch(error => {
                // console.log(error);
                this.loading = false;
            });

        },

        getFiles(type) {
            this.setActive(type);
            this.fetchFile(type);

            if (this.activeTab === 'video') {
                this.isVideo = true;
            } else {
                this.isVideo = false;
            }
        },

        submitForm() {
            this.formData = new FormData();
            this.formData.append('name', this.fileName);
            this.formData.append('file', this.attachment);

            axios.post('/bijlagen/aanmaken', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(response => {
                    this.resetForm();
                    this.showNotification('Bijlage geupload!', true);
                    this.fetchFile(this.activeTab);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.showNotification(error.response.data.message, false);
                    this.fetchFile(this.activeTab);
                });
        },

        addFile() {
            this.attachment = this.$refs.file.files[0];
            this.fileName = this.$refs.file.files[0].name;
        },

        prepareToDelete(file) {
            this.deletingFile = {};
            this.deletingFile = file;
            this.showConfirm = true;
        },

        cancelDeleting() {
            this.deletingFile = {};
            this.showConfirm = false;
        },

        deleteFile() {
            axios.post('/bijlagen/' + this.deletingFile.id + '/verwijderen')
                .then(response => {
                    this.showNotification('Bijlage verwijderd!', true);
                    this.fetchFile(this.activeTab, this.pagination.current_page);
                })
                .catch(error => {
                    this.errors = error.response.data.errors();
                    this.showNotification('Er ging iets mis! Probeer het later.', false);
                    this.fetchFile(this.activeTab, this.pagination.current_page);
                });

            this.cancelDeleting();
        },

        editFile(file) {
            this.editingFile = file;
            this.savedFile.type = file.type;
            this.savedFile.name = file.name;
            this.savedFile.extension = file.extension;
        },

        endEditing(file) {
            this.editingFile = {};

            if (file.name.trim() === '') {
                alert('Bestandsnaam kan niet leeg zijn!');
                this.fetchFile(this.activeTab);
            } else {
                let formData = new FormData();
                formData.append('name', file.name);
                formData.append('type', file.type);
                formData.append('extension', file.extension);

                axios.post('/bijlagen/' + file.id + '/bewerken', formData)
                    .then(response => {
                        if (response.data === true) {
                            this.showNotification('Bestandnaam gewijzigd!', true);

                            var src = document.querySelector('[alt="' + file.name +'"]').getAttribute("src");
                            document.querySelector('[alt="' + file.name +'"]').setAttribute('src', src);
                        }
                        this.fetchFile(this.activeTab, this.pagination.current_page);
                    })
                    .catch(error => {
                        // console.log(error);
                        this.errors = error.response.data.errors;
                        this.showNotification(error.response.data.message, false);
                        this.fetchFile(this.activeTab, this.pagination.current_page);
                    });
            }
        },

        showNotification(text, success) {
            if (success === true) {
                this.clearErrors();
            }

            var application = this;
            application.message = text;
            application.notification = true;
            setTimeout(function() {
                application.notification = false;
            }, 15000);
        },

        showModal(file) {
            this.file = file;
            this.modalActive = true;
        },

        closeModal() {
            this.modalActive = false;
            this.file = {};
        },

        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.fetchFile(this.activeTab, page);
        },

        resetForm() {
            this.formData = {};
            this.fileName = '';
            this.attachment = '';
        },

        anyError() {
            return Object.keys(this.errors).length > 0;
        },

        clearErrors() {
            this.errors = {};
        }
    },

    mounted() {
        if ( this.$refs["imagePreview"] ) {
            this.image = this.$refs["imagePreview"].dataset.src;
        }
        if (this.pagination ){
          this.fetchFile(this.activeTab, this.pagination.current_page);
        }
    },

    computed: {
        // pages() {
        //     let pages = [];

        //     let from = this.pagination.current_page - Math.floor(this.offset / 2);

        //     if (from < 1) {
        //         from = 1;
        //     }

        //     let to = from + this.offset - 1;

        //     if (to > this.pagination.last_page) {
        //         to = this.pagination.last_page;
        //     }

        //     while (from <= to) {
        //         pages.push(from);
        //         from++;
        //     }

        //     return pages;
        // }
    }
});
