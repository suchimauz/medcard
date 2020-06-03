<input type="hidden" name="patient_id" value="{{ $user->patient->id }}">
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Название исследования</label>
            <input type="text" class="form-control" placeholder="Введите название исследования" name="name" 
                @if(isset($research->name)) 
                    value="{{ $research->name }}" 
                @endif
            required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Дата проведения исследования</label>
            <input type="datetime-local" class="form-control" name="date" 
                @if(isset($research->date)) 
                    value="{{ date('Y-m-d\TH:i:s',strtotime($research->date)) }}" 
                @endif
            required>
        </div>
    </div>
</div>