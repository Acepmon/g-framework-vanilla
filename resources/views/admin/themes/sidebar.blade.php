<style>
    .media-active {
        background-color: #fafafa;
    }
</style>

<div class="panel">
    <div class="panel-body panel-body-accent">
        <h4 class="text-semibold no-margin">
            <a href="{{ route('admin.themes.show', $theme->id) }}" class="text-default">{{ $theme->title }}</a>
        </h4>

        <p>
            {{ $theme->description }}
        </p>

        <dl>
            <dt>Version</dt>
            <dd>{{ $theme->version }}</dd>
            <dt>Status</dt>
            <dd class="text-capitalize">{{ $theme->status }}</dd>
            <dt>Repository</dt>
            <dd style="white-space: nowrap; overflow: hidden; text-overflow: ellipses;"><a href="{{ $theme->repository }}" target="_blank">{{ $theme->repository }}</a></dd>
        </dl>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h5 class="panel-title">Layouts ({{ count($theme->layouts()) }})</h5>
    </div>

    <ul class="media-list media-list-linked">
        @foreach($theme->layouts() as $index => $item)
        <li class="media {{ isset($layout) ? $layout['text'] == $item['text'] ? 'media-active' : '' : '' }}">
            <a href="{{ route('admin.themes.layouts.edit', [$theme->id, $item['text']]) }}" class="media-link">
                <div class="media-body">
                    {{ $index + 1 }}.  {{ $item['text'] }}
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>

<div class="panel">
    <div class="panel-heading">
        <h5 class="panel-title">Includes ({{ count($theme->includes()) }})</h5>
    </div>

    <ul class="media-list media-list-linked">
        @foreach($theme->includes() as $index => $item)
        <li class="media {{ isset($include) ? $include['text'] == $item['text'] ? 'media-active' : '' : '' }}">
            <a href="{{ route('admin.themes.includes.edit', [$theme->id, $item['text']]) }}" class="media-link">
                <div class="media-body">
                    {{ $index + 1 }}.  {{ $item['text'] }}
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
