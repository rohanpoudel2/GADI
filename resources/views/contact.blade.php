<x-layout dontshow="true">
    @php
        $formFields = [
            '
                <div class="form-item">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" >
                </div>
                ',
        
            '
                <div class="form-item">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" >
                </div>
                ',
        
            '
                <div class="form-item">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                ',
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
