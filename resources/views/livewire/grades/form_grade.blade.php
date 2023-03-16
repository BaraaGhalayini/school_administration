<div class="row setup-content">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('grade_trans.name_ar')}}</label>
                    <input type="text" wire:model.lazy="name_ar"  class="form-control">
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('grade_trans.name_en')}}</label>
                    <input type="text" wire:model.lazy="name_en" class="form-control" >
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('grade_trans.note')}}</label>
                    <input type="text" wire:model.lazy="note" class="form-control" >
                    @error('note')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @if($updateMode)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_edit"
                        type="button">{{trans('grade_trans.edit_grade')}}
                </button>
            @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_add"
                        type="button">{{trans('grade_trans.add_grade')}}
                </button>
            @endif

        </div>
    </div>
</div>
