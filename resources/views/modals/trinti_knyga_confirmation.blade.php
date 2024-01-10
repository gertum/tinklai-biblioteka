<div class="modal fade" id="trinti_knyga_confirmation{{$knyga->id}}" tabindex="-1" role="dialog" aria-labelledby="trinti_knyga_confirmation_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trinti_knyga_confirmation_modal">Trynimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Knygos Pavadinimas: {{ $knyga->pavadinimas }}</p>
                <p>Knygos Autorius: {{ $knyga->autorius }}</p>
                <!-- Įtraukti kitą knygos informaciją, jei reikia -->
                <p>Ar tikrai norite trinti šią knygą? "{{ $knyga->pavadinimas }}"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>
                <form action="{{ route('trinti-knyga', ['id' => $knyga->id]) }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Patvirtinti Trynimą</button>
                </form>
            </div>


        </div>
    </div>
</div>
