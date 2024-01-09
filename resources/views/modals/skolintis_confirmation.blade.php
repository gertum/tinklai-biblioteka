<div class="modal fade" id="skolintis_confirmation{{$knyga->id}}" tabindex="-1" role="dialog" aria-labelledby="skolintis_confirmation_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skolintis_confirmation_modal">Patvirtinimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Vartotojo ID: {{ Auth::id() }}</p>
                <p>Knygos Pavadinimas: {{ $knyga->pavadinimas }}</p>
                <p>Knygos Autorius: {{ $knyga->autorius }}</p>
                <!-- Įtraukti kitą knygos informaciją, jei reikia -->
                <p>Ar tikrai norite pasiskolinti "{{ $knyga->pavadinimas }}"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>
                <form action="{{ route('skolintis', ['book_id' => $knyga->id]) }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <button type="submit" class="btn btn-primary">Patvirtinti Skolinimą</button>
                </form>
            </div>

        </div>
    </div>
</div>
