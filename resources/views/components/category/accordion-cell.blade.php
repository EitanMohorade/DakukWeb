<tr>
    <td colspan="4">
        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-{{ $category->id }}">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-{{ $category->id }}" aria-expanded="true"
                    aria-controls="accordion-collapse-body-{{ $category->id }}">
                    <span>{{ $category->name }}</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            @foreach ($category->children as $category)
                <div id="accordion-collapse-body-{{ $category->id }}" class="hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $category->id }}">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">
                            {{ $category->name }}
                        </p>
                    </div>
                </div>
            @endforeach
    </td>
</tr>
