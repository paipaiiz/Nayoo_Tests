import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return { x: 0, y: 0 }
  },
  routes: [
    // {
    //   path: '/',
    //   name: 'home',
    //   component: () => import('@/views/Home.vue'),
    //   meta: {
    //     pageTitle: 'Home',
    //     breadcrumb: [
    //       {
    //         text: 'Home',
    //         active: true,
    //       },
    //     ],
    //   },
    // },
    // {
    //   path: '/second-page',
    //   name: 'second-page',
    //   component: () => import('@/views/SecondPage.vue'),
    //   meta: {
    //     pageTitle: 'Second Page',
    //     breadcrumb: [
    //       {
    //         text: 'Second Page',
    //         active: true,
    //       },
    //     ],
    //   },
    // },
    {
      path: '/',
      redirect: '/flowchart',
    },
    {
      path: '/flowchart',
      name: 'flowchart',
      component: () => import('@/views/Flowchart.vue'),
      meta: {
        pageTitle: 'ข้อที่ 1',
        breadcrumb: [
          {
            text: 'ข้อที่ 1',
            active: true,
          },
        ],
      },
    },
    {
      path: '/changepayment',
      name: 'changePayment',
      component: () => import('@/views/ChangePayment.vue'),
      meta: {
        pageTitle: 'ข้อที่ 2',
        breadcrumb: [
          {
            text: 'ข้อที่ 2',
            active: true,
          },
        ],
      },
    },
    {
      path: '/manageAlbum',
      name: 'manageAlbum',
      component: () => import('@/views/ManageAlbum.vue'),
      meta: {
        pageTitle: 'ข้อที่ 3',
        breadcrumb: [
          {
            text: 'ข้อที่ 3',
            active: true,
          },
        ],
      },
    },
    {
      path: '/comparsion',
      name: 'comparsion',
      component: () => import('@/views/Compare.vue'),
      meta: {
        pageTitle: 'ข้อที่ 4',
        breadcrumb: [
          {
            text: 'ข้อที่ 4',
            active: true,
          },
        ],
      },
    },
    {
      path: '/album/pictureall',
      name: 'pictureAll',
      component: () => import('@/views/PictureAll.vue'),
      meta: {
        pageTitle: 'All Picture',
        breadcrumb: [
          {
            text: 'All Picture',
            active: true,
          },
        ],
      },
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('@/views/Login.vue'),
      meta: {
        layout: 'full',
      },
    },
    {
      path: '/error-404',
      name: 'error-404',
      component: () => import('@/views/error/Error404.vue'),
      meta: {
        layout: 'full',
      },
    },
    {
      path: '*',
      redirect: 'error-404',
    },
  ],
})

// ? For splash screen
// Remove afterEach hook if you are not using splash screen
router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
  if (appLoading) {
    appLoading.style.display = 'none'
  }
})

export default router
