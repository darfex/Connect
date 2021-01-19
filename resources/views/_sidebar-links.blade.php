<div class="lg:w-32 lg:mt-10 bg-white">
    <ul>
        <li>
            <a href="{{ route('profile', $user) }}"
                class="font-bold text-lg mb-4 block {{ Request::path() === '/' ? 'underline' : ''}}">Overview</a>
        </li>
        <li>
            <a href="{{ route('publications', $user) }}"
                class="font-bold text-lg mb-4 block {{ Request::is('publications') ? 'bg-blue-300' : ''}}">Publications</a>
        </li>
        <li>
            <a href="{{ route('profile', $user) }}/posts"
                class="font-bold text-lg mb-4 block {{ Request::path() === '/' ? 'current_page_item' : ''}}">Posts</a>
        </li>
        <li>
            <a href="{{ route('profile', $user) }}/followers"
                class="font-bold text-lg mb-4 block {{ Request::path() === '/' ? 'current_page_item' : ''}}">Followers</a>
        </li>
        <li>
            <a href="{{ route('profile', $user) }}/followings"
                class="font-bold text-lg mb-4 block {{ Request::path() === '/' ? 'current_page_item' : ''}}">Following</a>
        </li>
        <li>
            <a href="/notifications"
                class="font-bold text-lg mb-4 block {{ Request::path() === '/' ? 'current_page_item' : ''}}">Notifications</a>
        </li>
        <li>
            <a href="/stats"
                class="font-bold text-lg mb-4 block {{ Request::path() === '/' ? 'current_page_item' : ''}}">Stats</a>
        </li>
    </ul>
</div>