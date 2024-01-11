<div class="modal fade" id="zinutes_siuntimas" tabindex="-1" role="dialog" aria-labelledby="zinutes_siuntimas_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zinutes_siuntimas_modal">Žinutės Siuntimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('zinutes.create') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->

                    <div class="form-group">
                        <label for="siuncia_vartotojas_vardas">Siuntėjas:</label>
                        <input type="text" class="form-control" id="siuncia_vartotojas_vardas" name="siuncia_vartotojas_vardas" value="{{ auth()->user()->vardas }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="gauna_vartotojas_vardas">Gavėjas:</label>
                        <input type="text" class="form-control" id="gauna_vartotojas_vardas" name="gauna_vartotojas_vardas" placeholder="Pasirinkite gavėją" required>
                    </div>


                    <div class="form-group">
                        <label for="tekstas">Žinutės Tekstas:</label>
                        <textarea class="form-control" id="tekstas" name="tekstas" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Siųsti Žinutę</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>
            </div>
        </div>
    </div>
</div>
