<div class="row setup-content">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('classroom_trans.name_ar')}}</label>
                    <input type="text" wire:model="name_ar"  class="form-control">
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('classroom_trans.name_en')}}</label>
                    <input type="text" wire:model="name_en" class="form-control" >
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @if($updateMode)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_edit"
                        type="button">{{trans('classroom_trans.edit_grade')}}
                </button>
            @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_add"
                        type="button">{{trans('classroom_trans.add_grade')}}
                </button>
            @endif

        </div>
    </div>
</div>
