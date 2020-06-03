<div class="sidebar">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                @if (Auth::user()->role() == 'patient')
                    <li @if(Request::is('/')) class="active" @endif>
                        <a href="/">
                            <i class="iconsmind-Medical-Sign"></i>
                            <span>Медкарта</span>
                        </a>
                    </li>
                    <li @if(Request::is('encounter')) class="active" @endif>
                        <a href="/encounter">
                            <i class="iconsmind-Cardiovascular"></i>
                            <span>Обращения</span>
                        </a>
                    </li>
                    <li @if(Request::is('research')) class="active" @endif>
                        <a href="/research">
                            <i class="iconsmind-Magnifi-Glass2"></i>
                            <span>Исследования</span>
                        </a>
                    </li>
                    <li @if(Request::is('test')) class="active" @endif>
                        <a href="/test">
                            <i class="iconsmind-Flask-2"></i>
                            <span>Анализы</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role() == 'practitioner')
                    <li class="active">
                        <a href="/">
                            <i class="iconsmind-Mens"></i>
                            <span>Пациенты</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role() == 'admin')
                    <li class="active">
                        <a href="/">
                            <i class="iconsmind-Boy"></i>
                            <span>Пользователи</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>