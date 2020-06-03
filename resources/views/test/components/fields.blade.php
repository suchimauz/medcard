<input type="hidden" name="patient_id" value="{{ $user->patient->id }}">
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Название анализа</label>
            <input type="text" class="form-control" placeholder="Введите причину обращения" name="name" 
                @if(isset($test->name)) 
                    value="{{ $test->name }}" 
                @endif
            required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Дата взятия анализа</label>
            <input type="datetime-local" class="form-control" name="date" 
                @if(isset($test->date)) 
                    value="{{ date('Y-m-d\TH:i:s',strtotime($test->date)) }}" 
                @endif
            required>
        </div>
    </div>
</div>