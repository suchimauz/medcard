<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label>Адрес</label>
            <input type="text" class="form-control" placeholder="Введите адрес" name="address" 
                @if(old('address'))
                    value="{{ old('address') }}"  
                @elseif(isset($patient->address)) 
                    value="{{ $patient->address }}" 
                @endif
            required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Гражданство</label>
            <input type="text" class="form-control" placeholder="Введите гражданство" name="citizenship" 
                @if(old('citizenship'))
                    value="{{ old('citizenship') }}"
                @elseif(isset($patient->citizenship))
                    value="{{ $patient->citizenship }}"
                @endif
            required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Дата рождения</label>
            <div class="input-group">
                <input type="date" class="form-control" placeholder="Введите дату рождения" name="birth_date"
                    @if(old('birth_date'))
                        value="{{ old('birth_date') }}"
                    @elseif(isset($patient->birth_date)) 
                        value="{{ $patient->birth_date }}"
                    @endif
                required>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>ЕНП</label>
            <input type="text" class="form-control" placeholder="Введите ЕНП" name="enp" 
                @if(old('enp'))
                    value="{{ old('enp') }}"  
                @elseif(isset($patient->enp)) 
                    value="{{ $patient->enp }}" 
                @endif
            required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>СНИЛС</label>
            <input type="text" class="form-control" placeholder="Введите СНИЛС" name="snils" 
                @if(old('snils'))
                    value="{{ old('snils') }}"
                @elseif(isset($patient->snils))
                    value="{{ $patient->snils }}"
                @endif
            required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Номер телефона</label>
            <input type="text" class="form-control" placeholder="Введите дату рождения" name="phone" 
                @if(old('phone'))
                    value="{{ old('phone') }}"
                @elseif(isset($patient->phone)) 
                    value="{{ $patient->phone }}"
                @endif
            >
        </div>
    </div>
</div>