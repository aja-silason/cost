
                const loginForm = document.querySelector("form.formlogin");
                const criarcontaForm = document.querySelector("form.formcreate");

                const loginbtn = document.querySelector("label.login");
                const criarbtn = document.querySelector("label.criar");

                const criarlink = document.querySelector(".criarconta a");

                const loginText = document.querySelector(".titulo.login");
                const criarText = document.querySelector(".titulo.criarconta");

                criarbtn.onclick = (() => {
                    loginForm.style.marginLeft = "-115%";
                    criarcontaForm.style.marginLeft = "-115%";
                    loginText.style.marginLeft = "-50%";
                });
                loginbtn.onclick = (() => {
                    loginForm.style.marginLeft = "0%";
                    criarcontaForm.style.marginLeft = "0%";
                    loginText.style.marginLeft = "0%";
                });
                criarlink.onclick = (() => {
                    criarbtn.click();
                    return false;
                });