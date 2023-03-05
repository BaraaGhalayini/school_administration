<div class="row setup-content">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('classroom_trans.classrooms_ar')}}</label>
                    <input type="text" wire:model="classrooms_ar"  class="form-control">
                    @error('classrooms_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('classroom_trans.classrooms_en')}}</label>
                    <input type="text" wire:model="classrooms_en" class="form-control" >
                    @error('classrooms_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('classroom_trans.grade_name')}}</label>
                    <input type="text" wire:model="Grade_id" class="form-control" >
                    @error('Grade_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @if($updateMode)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_edit"
                        type="button">{{trans('classroom_trans.edit_classroom')}}
                </button>
            @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_add"
                        type="button">{{trans('classroom_trans.add_classroom')}}
                </button>
            @endif

        </div>
    </div>
</div>
