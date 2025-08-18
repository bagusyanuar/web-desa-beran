@props(['store', 'stateData'])

@if (empty($store) || empty($stateData))
    @php
        throw new Exception('The "store" property is required.');
    @endphp
@endif
<div class="my-4" x-bind="recaptcha" x-bind:store="'{{ $store }}'" x-bind:state-data="'{{ $stateData }}'">
    <template x-if="!captchaReady">
        <span>Loading for captcha...</span>
    </template>
    <div x-ref="recaptchaEl" id="recaptcha-container"></div>
</div>
