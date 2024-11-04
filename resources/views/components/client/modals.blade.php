@props(['reasons'])

<div class="modal fade" id="reportPostForm" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Reportar publicación
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('report.post') }}">
                    @csrf
                    <input type="hidden" name="postuid" id="postuid">
                    <div class="mb-3">
                        <label for="message" class="form-label">Detalles: </label>
                        <textarea type="text" class="form-control" name="message" id="message" rows="3" style="resize: none;" required></textarea>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Motivo</label>
                            <select class="form-select" name="reason" id="reason" required>
                                <option value="" selected>Seleccione un motivo</option>
                                @foreach ($reasons as $reason)
                                <option value="{{ $reason->uid }}">{{ $reason->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var p_uid = localStorage.getItem('postRepUID');
        document.getElementById('postuid').value = p_uid;
    });

</script>

