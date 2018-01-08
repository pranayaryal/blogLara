<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.tiny-mce",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern code codesample"
    ],
    toolbar: "insertfile undo redo | code codesample styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    // Use HTML5
    schema: "html5",
    // Code sample settinss
    codesample_languages: [
      {text: 'HTML/XML', value: 'markup'},
      {text: 'JavaScript', value: 'javascript'},
      {text: 'CSS', value: 'css'},
      {text: 'SCSS', value: 'scss'},
      {text: 'PHP', value: 'php'},
      {text: 'Ruby', value: 'ruby'},
      {text: 'Python', value: 'python'},
      {text: 'Markdown', value: 'markdown'},
    ],
    // Full URLs
    relative_urls: false,
    // Enable advanced image options
    image_advtab: true,
    // Enable image captions
    image_caption: true,
    // Remove fixed dimensions from images
    image_dimensions: false,
    contentEditable: true,
    // Add containers to formats
    style_formats: [
      { title: 'Containers',
        items: [
          { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
          { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
          { title: 'blockquote', block: 'blockquote', wrapper: true },
          { title: 'aside', block: 'aside', wrapper: true },
          { title: 'figure', block: 'figure', wrapper: false },
        ]
      },
    ],
    style_formats_merge: true,
    templates: [
      { title: 'Image Right',
        content: `
          <div class="image-right">
            <div class="image-photo">
              <img src="https://satyr.io/500x300/" alt="">
            </div>
            <small class="image-caption">This is a caption.</small>
          </div>
        `
      },
      { title: 'Image Left',
        content: `
          <div class="image-left">
            <div class="image-photo">
              <img src="https://satyr.io/500x300/" alt="">
            </div>
            <small class="image-caption">This is a caption.</small>
          </div>
        `
      },
      { title: 'Image Full',
        content: `
          <div class="image-full">
            <div class="image-photo">
              <img src="https://satyr.io/500x300/" alt="">
            </div>
            <small class="image-caption">This is a caption.</small>
          </div>
        `
      },
      { title: 'Blockquote Right',
        content: `
          <blockquote class="blockquote-right">
            This is some placeholder copy.
          </blockquote>
        `
      },
      { title: 'Blockquote Left',
        content: `
          <blockquote class="blockquote-left">
            This is some placeholder copy.
          </blockquote>
        `
      },
    ],
    visualblocks_default_state: true,
    end_container_on_empty_block: true,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
