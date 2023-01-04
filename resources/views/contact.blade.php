<x-layout dontshow="true">
    @php
        $formFields = [
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
                'value' => '',
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
                'value' => '',
            ],
            [
                'name' => 'message',
                'label' => 'Message',
                'type' => 'textarea',
                'value' => '',
            ],
        ];
    @endphp

    <section class="contact-section">
        <div class="container">
            <div class="contact">
                <div class="left">
                    <div class="contact-title">
                        <h1>Got Questions?<br /> We have the answers.</h1>
                    </div>
                </div>
                <div class="right">
                    @component('components.form', ['formFields' => $formFields])
                        @slot('action')
                            /contact-form
                        @endslot
                        @slot('method')
                            POST
                        @endslot
                        @slot('submitText')
                            Submit
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
</x-layout>
