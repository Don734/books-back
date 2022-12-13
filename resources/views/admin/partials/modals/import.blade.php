<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Products import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('products.import')}}" method="POST" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <x-adminlte-input-file id="excel" name="excel" label-class="text-lightblue" placeholder="Выберите файл..." legend="Выбрать">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file-upload text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="importForm">Import</button>
            </div>
        </div>
    </div>
</div>