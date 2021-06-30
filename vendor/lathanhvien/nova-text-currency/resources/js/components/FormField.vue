<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                class="w-full form-control form-input form-input-bordered"
                :id="field.attribute"
                :dusk="field.attribute"
                v-model="value"
                v-bind="extraAttributes"
                :disabled="isReadonly"
            />
            <p
                class="py-1"
            >{{ showValue(this.value) }}</p>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [HandlesValidationErrors, FormField],
    computed: {
        defaultAttributes() {
            return {
                type: this.field.type || 'text',
                min: this.field.min,
                max: this.field.max,
                step: this.field.step,
                pattern: this.field.pattern,
                placeholder: this.field.placeholder || this.field.name,
                class: this.errorClasses,
            }
        },

        extraAttributes() {
            const attrs = this.field.extraAttributes

            return {
                // Leave the default attributes even though we can now specify
                // whatever attributes we like because the old number field still
                // uses the old field attributes
                ...this.defaultAttributes,
                ...attrs,
            }
        },
    },
    methods: {
        showValue (value) {
            // value is a text string
            let part1 = undefined;
            let part2 = undefined;
            let regex = /^(\d*)\.?(\d*)$/g;
            let result = regex.exec(value);
            if (result) {
                part1 = result[1];
                part2 = result[2];
            }
            // insert thousand separators
            if (part1 != undefined && part1 != "") {
                part1 = part1.replace(/(\d)(?=(\d{3})+$)/g, "$1,");
            }
            // concat 2 parts
            let part = "NaN";
            if (part1==undefined || part1=="") {
                part = "NaN";
            }else if (part2==undefined || part2=="") {
                part = part1;
            }else{
                part = part1 + "." + part2;
            }
            // return part;
            return String.fromCharCode(this.field.sign) + " " + part;
        }
    }
}
</script>
