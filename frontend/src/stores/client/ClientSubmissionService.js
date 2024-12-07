import { defineStore } from "pinia";
export const useSubmission = defineStore("submission", {
    state: () => {
        return {
            problem: null,
            output: null,
            errors: {},
        };
    },
    actions: {
        async getProblems() {
            if (localStorage.getItem("token")) {
                const res = await fetch("/api/problems", {
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
                return data;
            }
        },
        async submitCode(formData) {
            const res = await fetch(`/api/submission`, {
                method: "POST",
                body: JSON.stringify(formData),
            });

            const data = await res.json();
            if (data.error) {
                this.errors = data.data;
            } else {
                
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
