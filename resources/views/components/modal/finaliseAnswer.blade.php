<div class="modal fade" id="finaliseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center">Apakah anda yakin ingin memfinalisasi jawaban anda?</p>
                <p class="text-center">Anda tidak dapat mengubah jawaban anda kembali.</p>
                <div class="row justify-content-center">
                    <div class="col-6">
                        {{ Form::open(['route' => 'finalise-answer']) }}
                            {{ Form::hidden('FinaliseToken', $finalisasiToken) }}
                            {{ Form::submit('Iya', ['class' => 'btn btn-success float-right']) }}
                        {{ Form::close() }}
                    </div>
                    <div class="col-6">
                        <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>