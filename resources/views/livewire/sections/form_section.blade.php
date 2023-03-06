<div class="row setup-content">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="name_ar">{{trans('section_trans.name_ar')}}</label>
                    <input type="text" wire:model="name_ar"  class="form-control">
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name_en">{{trans('section_trans.name_en')}}</label>
                    <input type="text" wire:model="name_en" class="form-control" >
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="name_grade" class="control-label">{{ trans('grade_trans.name_grade') }}</label>
                    <select wire:model="name_grade" class="custom-select" onchange="console.log($(this).val())">
                        <!--placeholder-->
                        <option value="" selected >{{ trans('section_trans.Select_Grade') }}</option>
                        <option value=""></option>
                    </select>
                    @error('name_grade')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name_class" class="control-label">{{ trans('classroom_trans.Name_Class') }}</label>
                    <select wire:model="name_class" class="custom-select" onchange="console.log($(this).val())">
                        <!--placeholder-->
                        <option value="" selected >{{ trans('section_trans.Select_Class') }}</option>
                        <option value=""></option>
                    </select>
                    @error('name_class')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div  class="form-row">
                <div class="col">
                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_edit" type="button">{{trans('section_trans.edit_section')}}
                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_add" type="button">{{trans('section_trans.add_section')}}
                    </button>
                @endif
                </div>
            </div>

        </div>
    </div>
</div>
