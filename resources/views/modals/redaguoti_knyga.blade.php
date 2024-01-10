<div class="modal fade" id="redaguoti_knyga{{$knyga->id}}" tabindex="-1" role="dialog" aria-labelledby="redaguoti_knyga_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="redaguoti_knyga_modal">Knygos redagavimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-book', ['id' => $knyga->id]) }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    @method('PUT')
                    <div class="form-group">
                        <label for="pavadinimas{{$knyga->id}}">Knygos Pavadinimas:</label>
                        <input type="text" class="form-control" id="pavadinimas{{$knyga->id}}" name="pavadinimas" value="{{ $knyga->pavadinimas }}" required>
                    </div>
                    <div class="form-group">
                        <label for="autorius{{$knyga->id}}">Knygos Autorius:</label>
                        <input type="text" class="form-control" id="autorius{{$knyga->id}}" name="autorius" value="{{ $knyga->autorius }}" required>
                    </div>
                    <div class="form-group">
                        <label for="leidimo_metai{{$knyga->id}}">Leidimo Metai:</label>
                        <input type="number" class="form-control" id="leidimo_metai{{$knyga->id}}" name="leidimo_metai" value="{{ $knyga->leidimo_metai }}" required>
                    </div>
                    <div class="form-group">
                        <label for="egzemplioriu_skaicius{{$knyga->id}}">Egzempliorių Skaičius:</label>
                        <input type="number" class="form-control" id="egzemplioriu_skaicius{{$knyga->id}}" name="egzemplioriu_skaicius" value="{{ $knyga->egzemplioriu_skaicius }}" required>
                    </div>
                    <!-- Add other fields as needed -->

                    <button type="submit" class="btn btn-primary">Atnaujinti Knygą</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>
            </div>
        </div>
    </div>
</div>
