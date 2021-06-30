<template>
    <div v-if="field.asHtml" v-html="field.value"></div>
    <span v-else class="whitespace-no-wrap">{{ field.value }}</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    created: function () {
        this.field.value = this.showValue(this.field.value);
    },
    methods: {
        showSign (code) {
            return '&#' + code + ';';
        },
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
