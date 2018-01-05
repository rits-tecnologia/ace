<script>
    // System notifications
    Noty.overrideDefaults({
        layout: 'topRight',
        theme: 'bootstrap-v3',
        timeout: 4000,
    });

    // 1. Errors
    @if ($errors->count())
        @foreach ($errors->all() as $error)
            new Noty({ text: '{{ $error }}', type: 'error' }).show();
        @endforeach
    @else
        // No errors found
    @endif

    // 2. Success
    @if ($message = session('success'))
        new Noty({ text: '{{ $message }}', type: 'success' }).show();
    @else
        // No success messages found
    @endif

    // 3. Warning
    @if ($message = session('warning'))
        new Noty({ text: '{{ $message }}', type: 'warning' }).show();
    @else
        // No warning messages found
    @endif

    // 4. Information
    @if ($message = session('info'))
        new Noty({ text: '{{ $message }}', type: 'info' }).show();
    @else
        // No info messages found
    @endif
</script>
