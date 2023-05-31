<x-app-layout>

  <form action={{ route('admin.cms.cEditor.store') }} method="POST" class="grid grid-cols-3 gap-3 py-4" >
    @csrf
      <div class="col-start-1 col-end-4">
          <x-forms.input label="page" name="page" value=""  />
         </div>
          <!-- HTML Editor -->
      <div>
        <h2 class="text-yellow-600">HTML</h2>
        <textarea id="html-editor" name="html"></textarea>
      </div>

      <!-- CSS Editor -->
      <div>
<h2 class="text-yellow-600">CSS</h2>
        <textarea id="css-editor" name="css"></textarea>
      </div>


      <!-- JavaScript Editor -->
      <div>
<h2 class="text-yellow-600">Javascript</h2>
        <textarea id="js-editor" name="js"></textarea>
      </div>

        <div id="preview" class="p-3 bg-white col-start-1 col-end-4 my-4"></div>
   </form>
   @push('head')
  <script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js">
</script>
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/javascript/javascript.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/css/css.min.js"></script>

<!-- CodeMirror core auto close tags in html files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/addon/edit/closetag.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/addon/edit/matchtags.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/addon/hint/html-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/addon/edit/closebrackets.min.js"></script>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/cobalt.min.css">
   @endpush
   @push('scripts')
   <script>
       var htmlEditor = CodeMirror.fromTextArea(document.getElementById("html-editor"), {
      mode: "text/html",
      theme: "cobalt",
      lineNumbers: true,
      tabSize: 2,
      indentWithTabs: true,
      autoCloseTags: true,
      matchTags: {bothTags: true},
      extraKeys: {"Ctrl-Space": "autocomplete"},
      // hintOptions: {schemaInfo: htmlSchema}
    });

    // CSS Editor
    var cssEditor = CodeMirror.fromTextArea(document.getElementById("css-editor"), {
      mode: "css",
      theme: "cobalt",
      lineNumbers: true,
      tabSize: 2,
      indentWithTabs: true,
      autoCloseBrackets: true,
      matchBrackets: true,
      extraKeys: {"Ctrl-Space": "autocomplete"},
      hintOptions: {completeSingle: false}
    });

    // JavaScript Editor
    var jsEditor = CodeMirror.fromTextArea(document.getElementById("js-editor"), {
      mode: "javascript",
      theme: "cobalt",
      lineNumbers: true,
      tabSize: 2,
      indentWithTabs: true,
      autoCloseBrackets: true,
      matchBrackets: true,
      extraKeys: {"Ctrl-Space": "autocomplete"},
      hintOptions: {completeSingle: false}
    });
       var preview = document.getElementById("preview");
        // var previewDoc = preview.contentDocument || preview.contentWindow.document;
    var script = document.createElement("script");

function updatePreview() {
  var html = `
    <html>
      <head></head>
      <body>${htmlEditor.getValue()}</body>
      <style>${cssEditor.getValue()}</style>
    </html>`;
  preview.innerHTML = html;

  // Append any script tags in the JavaScript editor to the preview window's head
  var jsCode = jsEditor.getValue();
  var scripts = jsCode.match(/<script\b[^>]*>([\s\S]*?)<\/script>/gi);
  var links = jsCode.match(/<link\b[^>]*>/gi);
  if (scripts) {
    scripts.forEach(function (script) {
      var srcMatch = script.match(/src="([^"]+)"/i);
      if (srcMatch) {
        var src = srcMatch[1];
        var scriptEl = document.createElement("script");
        scriptEl.src = src;
        document.head.appendChild(scriptEl);
      } else {
        var scriptEl = document.createElement("script");
        scriptEl.textContent = script.replace(/<\/?script>/g, "");
        document.head.appendChild(scriptEl);
      }
      jsCode = jsCode.replace(script, "");
    });
  }
  if (links) {
    links.forEach(function (link) {
      var hrefMatch = link.match(/href="([^"]+)"/i);
      if (hrefMatch) {
        var href = hrefMatch[1];
        var linkEl = document.createElement("link");
        linkEl.rel = "stylesheet";
        linkEl.href = href;
        document.head.appendChild(linkEl);
      }
      jsCode = jsCode.replace(link, "");
    });
  }

  // Evaluate the remaining JavaScript code
  try {
    eval(jsCode);
  } catch (e) {
    console.error(e); // Log any error to the console
  }
}

// Update preview on code change
htmlEditor.on("change", updatePreview);
cssEditor.on("change", updatePreview);
jsEditor.on("change", updatePreview);

// Initialize preview
updatePreview();

        </script>
   @endpush
</x-app-layout>