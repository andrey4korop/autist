addComment = {
    moveForm: function(d, f, i, c) {
        tinymce.remove();
        var m = this,
            a, h = m.I(d),
            b = m.I(i),
            l = m.I("cancel-comment-reply-link"),
            j = m.I("comment_parent"),
            k = m.I("comment_post_ID");
        if (!h || !b || !l || !j) {
			alert(1);
			m.reload();
            return
        }
        m.respondId = i;
        c = c || false;
        if (!m.I("wp-temp-form-div")) {
            a = document.createElement("div");
            a.id = "wp-temp-form-div";
            a.style.display = "none";
            b.parentNode.insertBefore(a, b)
        }
        h.parentNode.insertBefore(b, h.nextSibling);
        if (k && c) {
            k.value = c
        }
        j.value = f;
        l.style.display = "";
        l.onclick = function() {
            tinymce.remove();
            var n = addComment,
                e = n.I("wp-temp-form-div"),
                o = n.I(n.respondId);
            if (!e || !o) {
                return
            }
            n.I("comment_parent").value = "0";
            e.parentNode.insertBefore(o, e);
            e.parentNode.removeChild(e);
            this.style.display = "none";
            m.reload();
            this.onclick = null;
            return false
        };
        try {
            m.I("comment").focus()
        } catch (g) {}
        m.reload();
        return false
    },
    I: function(a) {
        return document.getElementById(a)
    },
    reload: function () {
        console.log('dsdsd')
        tinymce.init({
            selector:'textarea',
            language: 'uk_UA',
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            },
            plugins: [
                "advlist autolink link image lists charmap hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons textcolor paste textcolor colorpicker textpattern"
            ],
            toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
            toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media  | insertdatetime | forecolor backcolor",
            toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | | ltr rtl | visualchars visualblocks nonbreaking pagebreak restoredraft | code",
        });
    }
};