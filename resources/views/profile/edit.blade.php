<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-between  items-center flex text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <img class="md:w-10 md:h-10 w-8 h-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE0klEQVR4nNVZTWwTRxTeS4t67qFAI7+3StRWTgQk3BASUFQEB0qiQqoUDj20aZSQVqiVguCQUktwcFMnIAFCHED8SSkSikAoMdyrkpgUYcW7cUyIDfm1HdvrxnFs76tmcSInjo09u07KJz1p5fW8+b6ZNzNv3gqCAXACbBwG+EYC6JIA+iQAt4wYlAEWNEMMst/S77pkgAbWRlhPDG3e/KGM+KMM0C8jEpcBPJERW5mvNSM+XFFRJgN0Soj/chPPtqiMaJPLyj4uGfGB7dvfcyH+JAMoBhKnTNMGBeDX4YqKDYaSdyF+KgH8UyricraQwSFR/MQQ8sMm01elHHU59/qIyAB1usjLAN/KAIk1J49LM5F0ATTxkUf8Yb2Iy9nWWnTYMPX/A+K0OBMSQG1B5N3l5RUSQHi9ScsrDUCRAD7LS95pNr9v1G7jNptpdO9ezdizQTPxlG3nOQVIACf1dDBSU0P+8+cpLsu0EvMuF/m7umikulqvkF9WJc9OwfSJyOV4qr2dUtEovQ2pSIQmT5/WFUpDJtOmbAEAnVwORZFCt25RsZi9cUNryymkYxl5lkzx5jZ+m414MWO18gqILksAtaySw9HL/fuJUiluAZRK0csDB7hESCZTS2b4cKXE0cePSS+Uvj4+AQB/vwkfk2mThKgW62Bk2zZSEwndAtREgtxbthQvAFH1iOJHArtJ8YzA66YmMgqvGxv5ZgHxa7b3d/E0nrZYDBMwfeYM72K2MQF9PI39HR2GCfB3dPAKeChIiB6expOnThkmYLKtjXchu9kWGuBp7D1yxDAB3sOH+WYAYIZtoXGuxuXllAwGdZNP+v2aL84ZmOcXgEiBCxd0C/B3dvLGf1oAZwgxc1dVUWJqipt8YmKC3JWV3AK0EJIQR7gdINLYwYOkxmJFk1fn52mstpaf/OIi5t1GM8139CglZ2cLJs/Wjq+hQVefaXvIfZCttBc7d1Lk/n0iVc0z7CpFenrIs2OHEeRJO8hYodUgZ5qN7t5NM+fOaUlabHBQM/Y8ffYsvdi1y7B+5DepRL3AEiKeZG69TVpM5tLp9JN3UMBfmRea1ndOAEDzsiulngt9LmN5Pk+uLxd7pUzPgo3X4cjWrTTe0qJd7ucGBigVDmdvnaGQ9o79Z7y5WZcwCfF3/WUVUSTfsWOk9PZy3cxYG6W3VztDiqpOAERyfp6SENsKcTJWV0dz/f1kFGLPnpG3vr5QAT8LucDKdqx8lzOmzWYK3blDpULo9u28ZUgJ0ZG3tJivuDu6Zw/FPR4qNeIej3YYrjLyCvtSlJf80noAqMssr7Oky4jcv1AkAwEaO3Qoc+STLsQvCyK/JAKxURv5fftW3VVKjZSiaEUvduJKovhdUeSXwqmm5vuFV69ovbDg85G7uvq4oAfBy5fbk+FwnhSzNEgqijp77dpvghGYvHTpi9jQ0Ntr5wYh5nRGZy9e/FwwEsOtrRsiDx70sJEpFfFkJKKGu7v7vCdOfCCUChNWa5Xy6JEjFY0aJiSpKKpitw+MW63mkhHPEmKxiOF79/6MOZ0RrhJ7KkWx588jobt3u8ctFlgz4qshcPVqVfDmTZtitz+dczhmFny+eCIUUlm+w4w9x73eeMzhmFbsdkfw+vU/AleuVBrR+X+g0ZiPu7vtvwAAAABJRU5ErkJggg==" alt="test-account">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl m-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl m-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl m-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
