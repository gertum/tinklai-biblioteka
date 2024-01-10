<div class="modal fade" id="prideti_knyga" tabindex="-1" role="dialog" aria-labelledby="prideti_knyga_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="prideti_knyga_modal">Knygos pridėjimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-book') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <div class="form-group">
                        <label for="pavadinimas">Knygos Pavadinimas:</label>
                        <input type="text" class="form-control" id="pavadinimas" name="pavadinimas" required>
                    </div>
                    <div class="form-group">
                        <label for="autorius">Knygos Autorius:</label>
                        <input type="text" class="form-control" id="autorius" name="autorius" required>
                    </div>
                    <div class="form-group">
                        <label for="leidimo_metai">Leidimo Metai:</label>
                        <input type="number" class="form-control" id="leidimo_metai" name="leidimo_metai" required>
                    </div>
                    <div class="form-group">
                        <label for="egzemplioriu_skaicius">Egzempliorių Skaičius:</label>
                        <input type="number" class="form-control" id="egzemplioriu_skaicius" name="egzemplioriu_skaicius" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Pridėti Knygą</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>
            </div>


        </div>
    </div>
</div>
