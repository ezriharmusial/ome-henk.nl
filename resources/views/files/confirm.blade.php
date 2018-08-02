<transition name="modal">
    <div class="modal" v-bind:class="{ is-active: showConfirm }">
        <div class="modal-background">
            <div class="modal-content">
                <div class="modal-card">
                    <div class="modal-card-head">
                        <p class="modal-card-title">Bestand Verwijderen?</p>
                    </div>
                    <div class="modal-card-body">
                        <p class="content">Druk op Verwijderen om het Bestand te verwijderen.</p>
                    </div>

                    <div class="modal-card-foot">
                        <button class="button is-outlined is-info" @click="cancelDeleting()">
                            <span class="icon">
                                <i class="fa fa-times"></i>
                            </span>
                            <span>Annuleren</span>
                        </button>
                        <button class="button is-danger" @click="deleteFile()">
                            <span class="icon">
                                <i class="fa fa-trash"></i>
                            </span>
                            <span>Verwijderen</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</transition>
