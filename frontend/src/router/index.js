import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/admin/Dashboard.vue";
import Show from "../views/admin/Show.vue";
import ClientLayout from "../components/ClientLayout.vue";
import AdminLayout from "../components/AdminLayout.vue";
import Login from "../views/auth/Login.vue";
import Home from "../views/client/Home.vue";
import RequestPassword from "../views/auth/RequestPassword.vue";
import ResetNewPassword from "../views/auth/ResetNewPassword.vue";
import GuestLayout from "../components/GuestLayout.vue";
import Products from "../views/admin/Products.vue";
import Register from "../views/auth/Register.vue";
import { useAuthStore } from "../stores/auth";
import ProductCreate from "../views/admin/ProductCreate.vue";
import ProductColors from "../views/admin/ProductColors.vue";
import ProductColorCreate from "../views/admin/ProductColorCreate.vue";
import ProductSizeCreate from "../views/admin/ProductSizeCreate.vue";
import ProductSizes from "../views/admin/ProductSizes.vue";

const routes = [
    {
        path: "/",

        component: ClientLayout,
        children: [
            {
                path: "/home",
                name: "home",
                component: Home,
            },
        ],
    },
    {
        path: "/admin",
        component: AdminLayout,

        children: [
            {
                path: "/admin/products",
                name: "products",
                component: Products,
                meta: { title: "Products" },
                   
            },
            {
                path: "/admin/products/create",
                name: "productCreate",
                component: ProductCreate,
                meta: { title: "Products" },
            },
            {
                path: "/admin/products/colors",
                name: "productColors",
                component: ProductColors,
                meta: { title: "الألوان" },
            },
            {
                path: "/admin/products/colors/create",
                name: "ProductColorCreate",
                component: ProductColorCreate,
                meta: { title: "أضف لونًا جديدًا" },
            },
            
            {
                path: "/admin/products/sizes",
                name: "productSizes",
                component: ProductSizes,
                meta: { title: "الأحجام" },
            },
            {
                path: "/admin/products/sizes/create",
                name: "ProductSizeCreate",
                component: ProductSizeCreate,
                meta: { title: "أضف حجما جديدًا" },
            },
            {
                path: "/admin/show",
                name: "show",
                component: Show,
            },
            {
                path: "",
                name: "dashboard",
                component: Dashboard,
            },
        ],
    },
    {
        path: "/login",

        component: GuestLayout,
        children: [
            {
                path: "",
                name: "login",
                component: Login,
                meta: { guest: true },
            },
            {
                path: "/register",
                name: "register",
                component: Register,
                meta: { guest: true },
            },
            {
                path: "/request-password",
                name: "request-password",
                component: RequestPassword,
            },
            {
                path: "/reset-new-password",
                name: "reset-new-password",
                component: ResetNewPassword,
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from) => {
    const authStore = useAuthStore();
    await authStore.getUser();
    if (authStore.user && to.meta.guest) {
        return { name: "home" };
    }
    // if (!authStore.user && to.meta.admin) {
    //     return  { name:'home'};
    // }
});

export default router;
