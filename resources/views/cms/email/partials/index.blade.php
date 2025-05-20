<section>
    <!-- Create the editor container -->
    <div id="editor">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br /></p>
    </div>
</section>

<!-- Initialize Quill editor -->
<script>
    const BlockEmbed = Quill.import('blots/block/embed');

    const quill = new Quill('#editor', {
        debug: 'info',
        modules: {
            toolbar: true,
        },
        theme: 'snow'
    });
</script>
