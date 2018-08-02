<div class="container is-fluid box">
    <div class="new-file">
        <form id="new-file-form" action="#" method="#" @submit.prevent="submitForm">
            <div class="field is-grouped">
                <div class="field has-addons">

                <p class="control is-expanded">
                    <input class="input is-fullwidth" type="text" name="name" v-model="fileName" placeholder="Bestandsnaam" required>
                </p>
                <div class="file is-right">
                    <label class="file-label">
                        <input class="file-input" type="file" ref="file" name="file"@change="addFile()" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-paperclip"></i>
                            </span>
                            <span class="file-label">
                                Bijlage Selecteren
                            </span>
                        </span>
                    </label>
                </div>
                </div>
                <p class="control">
                    <button type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-upload"></i>
                        </span>
                        <span>Uploaden</span>
                    </button>
                </p>
            </div>
        </form>
    </div>
</div>
