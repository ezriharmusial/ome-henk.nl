<template>
            <div class="field">
                <label class="label">Header Achtergrond</label>
                <label for="file">
                    <figure class="image is-2by1">
                        <img :src="image" class="img-responsive">
                    </figure>
                </label>
                <div class="file has-name is-right is-fullwidth">
                    <label class="file-label">
                        <input type="file" v-on:change="onFileChange" class="file-input" name="page-header" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-image"></i>
                            </span>
                            <span class="file-label">
                                Bestanden
                            </span>
                        </span>
                        <span class="file-name"  id="filename">
                        </span>
                    </label>
                </div>
            </div>
</template>
<style scoped>
/*    img{
        max-height: 36px;
    }*/
</style>
<script>
    export default{
        data(){
            return {
                image: 'https://via.placeholder.com/640/00d1b2/ffffff/?text=1280px%20*%20640px'
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
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
        }
    }
</script>
