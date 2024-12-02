import { defineStore } from "pinia";

export const useAdminPrductColorStore = defineStore("adminPrductColorStore", {
    state: () => {
        return {
            errors: {},
            colors: null,
        };
    },
    actions: {
        // CREATE color
        async createColor(formData) {
            const res = await fetch(`/api/colors`, {
                method: "POST",
                headers: {
                    authorization: `Bearer ${localStorage.getItem("token")}`,
                },
                body: JSON.stringify(formData),
            });
            if (res.ok) {
                this.router.push({ name: "productColors" });
            } else {
                const data = await res.json();

                this.errors = data.errors;
                console.log(this.errors);
            }
        },
        // edit
        async editColor(formData,colorId) {
            const res = await fetch(`/api/colors/${colorId}/edit`, {
                method: "PUT",
                headers: {
                    authorization: `Bearer ${localStorage.getItem("token")}`,
                },
                body: JSON.stringify(formData,colorId),
            });
            if (res.ok) {
                this.router.push({ name: "productColors" });
            } else {
                const data = await res.json();

                this.errors = data.errors;
                console.log(this.errors);
            }
        }, 
        // index
        async getColors() {
            if (localStorage.getItem("token")) {
                const res = await fetch("/api/colors", {
                    headers: {
                        authorization: `Bearer ${localStorage.getItem(
                            "token"
                        )}`,
                    },
                });
                const data = await res.json();
                return data;
            }
        }, 
    },
});
