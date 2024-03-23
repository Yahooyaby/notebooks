<!DOCTYPE html>
<html>
<head>
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/l5-swagger/swagger-ui.css') }}" >
</head>
<body>
<div id="swagger-ui"></div>

<script src="{{ asset('vendor/l5-swagger/swagger-ui-bundle.js') }}"></script>
<script src="{{ asset('vendor/l5-swagger/swagger-ui-standalone-preset.js') }}"></script>
<script>
    const ui = SwaggerUIBundle({
        url: "{{ url('api/documentation/json') }}",
        dom_id: '#swagger-ui',
        presets: [
            SwaggerUIBundle.presets.apis,
            SwaggerUIStandalonePreset
        ],
        layout: "StandaloneLayout"
    })
</script>
</body>
</html>

