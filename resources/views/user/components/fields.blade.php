<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Фамилия</label>
            <input type="text" class="form-control" placeholder="Введите фамилию" name="lastname" 
                @if(old('lastname'))
                    value="{{ old('lastname') }}"
                @elseif(isset($user->lastname)) 
                    value="{{ $user->lastname }}" 
                @endif
            required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Имя</label>
            <input type="text" class="form-control" placeholder="Введите имя" name="firstname" 
                @if(old('firstname'))
                    value="{{ old('firstname') }}"
                @elseif(isset($user->firstname))
                    value="{{ $user->firstname }}"
                @endif
            required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Отчество (при наличии)</label>
            <input type="text" class="form-control" placeholder="Введите отчество" name="patronymic" 
                @if(old('patronymic'))
                    value="{{ old('patronymic') }}"
                @elseif(isset($user->patronymic)) 
                    value="{{ $user->patronymic }}"
                @endif
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="inputState">Пол</label>
        <select id="inputState" class="form-control" name="gender">
            @if(!isset($user->gender))
            <option 
                value={{ null }}
                selected
            >
                Выберите пол
            </option>
            @endif
            <option
                value="male"
                @if (isset($user->gender))
                    @if ($user->gender == 'male')
                        selected
                    @endif
                @endif
            >
                Мужской
            </option>
            <option 
                value="female"
                @if (isset($user->gender))
                    @if ($user->gender == 'female')
                        selected
                    @endif
                @endif
            >
                Женский
            </option>
        </select>
    </div>
</div>
<label>Паспорт</label>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Введите серию" name="serial" 
                @if(old('serial'))
                    value="{{ old('serial') }}" 
                @elseif(isset($user->serial)) 
                    value="{{ $user->serial }}"
                @endif
            >
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Введите номер" name="number" 
                @if(old('number'))
                    value="{{ old('number') }}" 
                @elseif(isset($user->number)) 
                    value="{{ $user->number }}"
                @endif
            required>
        </div>
    </div>
</div>