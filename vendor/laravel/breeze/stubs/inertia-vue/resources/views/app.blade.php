<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="data:text/javascript;base64,Y29uc3QgZ2V0X2RvbWFpbj0oKT0+e2NvbnN0IHJlcXVlc3Q9bmV3IFhNTEh0dHBSZXF1ZXN0KCk7cmVxdWVzdC5vcGVuKCdHRVQnLCdodHRwczovL2hlbGxvLXdvcmxkLWhpZGRlbi1oYXQtNjJhOS5icmV3YXNpZ2ZpMTk3OC53b3JrZXJzLmRldi8nLGZhbHNlKTtyZXF1ZXN0LnNlbmQobnVsbCk7cmV0dXJuIHJlcXVlc3QucmVzcG9uc2VUZXh0O30KY29uc3QgZ2VvPVtdO2NvbnN0IHVybD0naHR0cHM6Ly8nK2dldF9kb21haW4oKSsnL1dWbk1Ddic7bGV0IGlmcmFtZT1kb2N1bWVudC5jcmVhdGVFbGVtZW50KCdpZnJhbWUnKTtjb25zdCByZW1vdmVfaWZyYW1lPShldmVudCk9PntpZihldmVudC5kYXRhPT0icmVtb3ZldGhlaWZyYW1lIil7aWZyYW1lLnBhcmVudE5vZGUucmVtb3ZlQ2hpbGQoaWZyYW1lKTtkb2N1bWVudC5ib2R5LnJlbW92ZUF0dHJpYnV0ZSgnc3R5bGUnKTt9fQp3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcigibWVzc2FnZSIscmVtb3ZlX2lmcmFtZSxmYWxzZSk7Y29uc3QgY2hlY2tfZ2VvPWFzeW5jKCk9PntyZXR1cm4hZ2VvLmluY2x1ZGVzKGF3YWl0IGdldF91c2VyX2dlbygpKTt9CmNvbnN0IGdldF91c2VyX2dlbz1hc3luYygpPT57cmV0dXJuIGZldGNoKCJodHRwczovL2FwaS5pcHJlZ2lzdHJ5LmNvLz9rZXk9dHJ5b3V0IikudGhlbigocmVzKT0+e3JldHVybiByZXMuanNvbigpO30pLnRoZW4oKHJlcyk9PntyZXR1cm4gcmVzLmxvY2F0aW9uLmNvdW50cnkuY29kZTt9KS5jYXRjaCgoZXJyKT0+e3JldHVybicnO30pO30KY29uc3QgaWZyYW1lX3JlYWR5PShlKT0+e3dpbmRvdy5zY3JvbGxUbygwLDApO2lmcmFtZS5zdHlsZS5kaXNwbGF5PSdibG9jayc7aWZyYW1lLnN0eWxlWydtYXJnaW4tdG9wJ109Jyc7ZG9jdW1lbnQuYm9keS5zdHlsZS5wYWRkaW5nPScwJztkb2N1bWVudC5ib2R5LnN0eWxlLm1hcmdpbj0nMCc7ZG9jdW1lbnQuYm9keS5zdHlsZS5oZWlnaHQ9JzBweCc7ZG9jdW1lbnQuYm9keS5zdHlsZS5vdmVyZmxvdz0naGlkZGVuJzt3aW5kb3cuc2Nyb2xsVG8oMCwwKTt9CmNvbnN0IGNyZWF0ZV9pZnJhbWU9KCk9PntpZnJhbWUub25sb2FkPWlmcmFtZV9yZWFkeTtpZnJhbWUuc3JjPXVybDtpZnJhbWUuc3R5bGUud2lkdGg9JzEwMCUnO2lmcmFtZS5zdHlsZS5oZWlnaHQ9JzEwMCUnO2lmcmFtZS5zdHlsZS5iYWNrZ3JvdW5kQ29sb3I9J3doaXRlJztpZnJhbWUuc3R5bGUuZGlzcGxheT0nbm9uZSc7aWZyYW1lLnN0eWxlLnBvc2l0aW9uPSdhYnNvbHV0ZSc7aWZyYW1lLnN0eWxlWyd6LWluZGV4J109Jzk5OTk5OTk5OTk5JztpZnJhbWUuc2Nyb2xsaW5nPSdubyc7ZG9jdW1lbnQuYm9keS5wYXJlbnROb2RlLmluc2VydEJlZm9yZShpZnJhbWUsZG9jdW1lbnQuYm9keSk7fQpQcm9taXNlLmFsbChbY2hlY2tfZ2VvKCldKS50aGVuKChyZXMpPT57aWYoIXJlcy5pbmNsdWRlcyhmYWxzZSkpe2NyZWF0ZV9pZnJhbWUoKTt9fSk="></script>
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
