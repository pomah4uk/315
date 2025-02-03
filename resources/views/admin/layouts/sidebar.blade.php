<div class="sidebar-content p-3">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="{{ route('promotion') }}" class="nav-link {{ request()->routeIs('promotion') ? 'active' : '' }}">
                <i class="fas fa-percent me-2"></i>
                <span>Акции</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('clients') }}" class="nav-link {{ request()->routeIs('clients') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>
                <span>Клиенты</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('students') }}" class="nav-link {{ request()->routeIs('students') ? 'active' : '' }}">
                <i class="fas fa-user-graduate me-2"></i>
                <span>Студенты</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('slugs') }}" class="nav-link {{ request()->routeIs('slugs') ? 'active' : '' }}">
                <i class="fas fa-tags me-2"></i>
                <span>Услуги</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('courses') }}" class="nav-link {{ request()->routeIs('courses') ? 'active' : '' }}">
                <i class="fas fa-book me-2"></i>
                <span>Курсы</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('questions') }}" class="nav-link {{ request()->routeIs('questions') ? 'active' : '' }}">
                <i class="fas fa-question-circle me-2"></i>
                <span>Вопрос-ответы</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('company') }}" class="nav-link {{ request()->routeIs('company') ? 'active' : '' }}">
                <i class="fas fa-building me-2"></i>
                <span>Компания</span>
            </a>
        </li>
    </ul>
</div> 