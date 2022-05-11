<?php

namespace App\Http\Middleware;

use App\AdminRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$page_name)
    {
        $white_list_routes = [
            'admin.user.role.edit','admin.blog.edit','admin.donations.edit','admin.events.edit','admin.menu.edit','admin.gigs.edit','admin.gigs.orders.message',
            'admin.jobs.edit','admin.knowledge.edit','admin.languages.words.edit','admin.page.edit','admin.popup.builder.edit','admin.products.edit',
            'admin.services.edit','admin.work.edit','admin.languages.words.backend','admin.languages.words.frontend'
        ];
        $current_route = $request->route()->getName();
        $auth_role_id = Auth::guard('admin')->user()->role; //->admin_role->permission;
        $get_role_permission = AdminRole::find($auth_role_id);
        $all_permission = (array) json_decode($get_role_permission->permission);
        if (array_key_exists($page_name,$all_permission) && !$request->isMethod('POST') && !$request->isMethod('PUT')){
            $all_perm = (array) $all_permission[$page_name];
            if (in_array($current_route,$all_perm) || in_array($current_route,$white_list_routes)){
                //add condition for check module enable/disable
                switch ($page_name){
                    case('blogs_manage'):
                        return get_static_option('blog_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('job_post_manage'):
                        return get_static_option('job_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('events_manage'):
                        return get_static_option('events_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('products_manage'):
                        return get_static_option('product_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('donations_manage'):
                        return get_static_option('donations_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('knowledgebase_manage'):
                        return get_static_option('knowledgebase_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('gigs_manage'):
                        return get_static_option('gig_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('services'):
                        return get_static_option('service_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    case('works'):
                        return get_static_option('works_module_status') == 'on' ? $next($request) : redirect()->route('admin.home');
                        break;
                    default:
                        return $next($request);
                        break;
                }

            }
        }elseif ($request->isMethod('POST') || $request->isMethod('PUT') ){
            return $next($request);
        }
        return redirect()->route('admin.home');
    }
}
