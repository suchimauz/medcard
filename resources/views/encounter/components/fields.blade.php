<input type="hidden" name="patient_id" value="{{ $user->patient->id }}">
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Причина обращения</label>
            <input type="text" class="form-control" placeholder="Введите причину обращения" name="reason" 
                @if(isset($encounter->reason)) 
                    value="{{ $encounter->reason }}" 
                @endif
            required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Дата обращения</label>
            <input type="datetime-local" class="form-control" name="date" 
                @if(isset($encounter->date)) 
                    value="{{ date('Y-m-d\TH:i:s',strtotime($encounter->date)) }}" 
                @endif
            required>
        </div>
    </div>
    <div class="col-md-6">
        <label>Врач</label>
        <select class="form-control select2-single" name="practitioner_id">
            @if(!isset($encounter->practitioner_id))
                <option value="{{ null }}">Выберите врача</option>
            @endif
            @foreach ($practitioners as $practitioner)
                <option 
                    value="{{ $practitioner->id }}"
                    @if(isset($encounter->practitioner_id))
                        @if($encounter->practitioner_id == $practitioner->id)
                            selected
                        @endif
                    @endif
                >
                    {{ $practitioner->lastname . ' ' . $practitioner->firstname . ' ' . $practitioner->patronymic }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Должность врача</label>
            <input type="text" class="form-control" placeholder="Введите должность врача, например: Врач-терапевт" name="practitioner_role" 
                @if(isset($encounter->practitioner_role)) 
                    value="{{ $encounter->practitioner_role }}" 
                @endif
            >
        </div>
    </div>
</div>