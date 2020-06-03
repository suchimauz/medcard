<div class="row">
    <div class="col-md-4">
        <div class="form-group row mb-1">
            <label class="col-12 col-form-label">Пациент</label>
            <div class="col-12">
                <div class="custom-switch custom-switch-success mb-2">
                    <input class="custom-switch-input" id="is_patient" type="checkbox" name="is_patient" 
                        @if(old('is_patient'))
                            @if(old('is_patient') == 'on')
                                checked
                            @endif
                        @elseif(isset($user->is_patient))
                            @if($user->is_patient >= 1)
                                checked
                            @endif
                        @endif
                    >
                    <label class="custom-switch-btn" for="is_patient"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row mb-1">
            <label class="col-12 col-form-label">Врач</label>
            <div class="col-12">
                <div class="custom-switch custom-switch-success mb-2">
                    <input class="custom-switch-input" id="is_practitioner" type="checkbox" name="is_practitioner" 
                        @if(old('is_practitioner'))
                            @if(old('is_practitioner') == 'on')
                                checked
                            @endif
                        @elseif(isset($user->is_practitioner))
                            @if($user->is_practitioner >= 1)
                                checked
                            @endif
                        @endif
                    >
                    <label class="custom-switch-btn" for="is_practitioner"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row mb-1">
            <label class="col-12 col-form-label">Администратор</label>
            <div class="col-12">
                <div class="custom-switch custom-switch-success mb-2">
                    <input class="custom-switch-input" id="is_admin" type="checkbox" name="is_admin" 
                        @if(old('is_admin'))
                            @if(old('is_admin') == 'on')
                                checked
                            @endif
                        @elseif(isset($user->is_admin))
                            @if($user->is_admin >= 1)
                                checked
                            @endif
                        @endif
                    >
                    <label class="custom-switch-btn" for="is_admin"></label>
                </div>
            </div>
        </div>
    </div>
</div>