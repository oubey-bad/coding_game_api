import { defineStore } from "pinia";
export const useSubmission = defineStore("submission", {
    state: () => {
        return {
            problem:null,
            output: null,
            errors: {},
        };
    },
    actions: {
        async getProblem() {
            if (localStorage.getItem("token")) {
                const res = await fetch("/api/user", {
                    headers: {
                        authorization: `Bearer ${localStorage.getItem(
                            "token"
                        )}`,
                    },
                });
                const data = await res.json();
                if (res.ok) {
                    this.problem = data;
                }
            }
        },
        async execute(apiRoute, formData, router) {
            const res = await fetch(`/api/${apiRoute}`, {
                method: "POST",
                body: JSON.stringify(formData),
            });
           
            const data = await res.json();
            if (data.data.error) {
                this.errors = data.data;
            } else {
                localStorage.setItem("token", data.data.token);
                this.user = data.data.name;
                this.router.push({ name: "home" });
            }
        },
        async logout() {
            const res = await fetch(`/api/logout`, {
                method: "POST",
                headers: {
                    authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            });
            const data = await res.json();
            console.log(data);
            if (res.ok) {
                this.user = null;
                this.errors = {};
                localStorage.removeItem("token");
                this.router.push({ name: "home" });
            }
        },
    },
});
