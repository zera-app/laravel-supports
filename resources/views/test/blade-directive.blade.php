<x-blank>
    <div class="container mx-auto grid gap-4 md:grid-cols-2 py-6">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                <h2 class="text-lg font-semibold">Str Blade Directive</h2>
            </div>

            <div class="px-6 py-4">
                <p>@lang('This is a language line')</p>
                <p>@fileResponse('/folder-name/test.txt')</p>
                <p>@fileRequest('test.txt')</p>
                <p>@limit('Lorem ipsum dolor sit amet consectetur adipiscing elit')</p>

                <code>
                    &#x40;lang('This is a language line')<br>
                    &#x40;fileResponse('/folder-name/test.txt')<br>
                    &#x40;fileRequest('test.txt')<br>
                    &#x40;limit('Lorem ipsum dolor sit amet consectetur adipiscing elit')
                </code>

            </div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                <h2 class="text-lg font-semibold">Number Blade Directive</h2>
            </div>

            <div class="px-6 py-4">
                <p>@formatCurrency(1000000)</p>
                <p>@formatNumber(1000000)</p>
                <p>@phoneNumber('0871-2345-6123')</p>
                <p>@toDecimal('1000,000')</p>
                <p>@reversePhoneNumber('0871-2345-1236')</p>

                <code>
                    &#x40;formatCurrency(1000000)<br>
                    &#x40;formatNumber(1000000)<br>
                    &#x40;phoneNumber(087123456)<br>
                    &#x40;toDecimal(1000,000)<br>
                    &#x40;reversePhoneNumber(087123456)
                </code>

            </div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                <h2 class="text-lg font-semibold">Date Blade Directive</h2>
            </div>

            <div class="px-6 py-4">
                <p>@date(now())</p>
                <p>@dateHuman(now())</p>
                <p>@time(now())</p>
                <p>@dateInformative(now())</p>
                <p>@dateTimeInformative(now())</p>

                <code>
                    &#x40;date(now())<br>
                    &#x40;dateHuman(now())<br>
                    &#x40;time(now())<br>
                    &#x40;dateInformative(now())<br>
                    &#x40;dateTimeInformative(now())<br>
                </code>

            </div>
        </div>

    </div>

</x-blank>
