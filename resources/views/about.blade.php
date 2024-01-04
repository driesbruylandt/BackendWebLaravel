<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project README') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6">Your Project README</h1>

                <section>
                    <h2 class="text-2xl font-semibold mb-4">About</h2>
                    <p class="text-gray-700">
                        Dag meneer, het idee van mijn project is een website voor mijn chiro. Waar hoofdleiding (admins) een post kunnen achterlaten over de afgelopen chiro zondagen. Denk aan dingen die goed waren of minder goed waren. Andere leiding kan dan doormiddel van een upvote of downvote laten weten of ze het eens zijn. Met alle benodigde requirements binnen het vak.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold my-4">Sources</h2>
                    <p class="text-gray-700">
                        The following sources were used during the development of this project:
                    </p>
                    <ul class="list-disc pl-8 text-gray-700">
                        <li>
                            Laravel documentation</em> - Retrieved from
                            <a href="https://laravel.com/docs/10.x/readme" class="text-blue-500">https://laravel.com/docs/10.x/readme</a>
                        </li>
                        <li>
                            Stackoverflow</em> - Retrieved from
                            <a href="https://stackoverflow.com/" class="text-blue-500">https://stackoverflow.com/</a>
                        </li>
                        <li>
                            Reddit</em> - Retrieved from
                            <a href="https://www.reddit.com/r/PHPhelp/comments/126vubb/sending_emails_via_laravel_discussion_needed_over/" class="text-blue-500">https://www.reddit.com/r/PHPhelp/comments/126vubb/sending_emails_via_laravel_discussion_needed_over/</a>
                        </li>
                        <li>
                            Mailtrap</em> - Retrieved from
                            <a href="https://mailtrap.io/home" class="text-blue-500">https://mailtrap.io/home</a>
                        </li>
                        <li>
                            Chat GPT 3.5</em> - Retrieved from
                            <a href="https://chat.openai.com/" class="text-blue-500">https://chat.openai.com/</a>
                        </li>
                        <li>
                            Github Repo</em> - Retrieved from
                            <a href="https://github.com/driesbruylandt/BackendWebLaravel" class="text-blue-500">https://github.com/driesbruylandt/BackendWebLaravel</a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
