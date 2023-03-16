
@if(!$Confirm_Delete_Show)
<!-- Deleted inFormation -->
<div class="modal fade" id="#delete({{ $grade->id }})" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">{{trans('main_trans.delete')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <h4>{{ $grade->Name_Grade }}</h4>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button> --}}

                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $grade->id }})" title="{{ trans('main_trans.delete') }}"><i class="fa fa-trash"></i></button>

                    <button  class="btn btn-danger">{{trans('main_trans.submit')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif