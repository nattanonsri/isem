<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\AdminProfileModel;
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $adminProfileModel = new AdminProfileModel();
        $uuid = session()->get('uuid');
        $adminProfile = $adminProfileModel->where('uuid', $uuid)->first();

        if ($adminProfile) {
            defined('IS_ALIVE') or define('IS_ALIVE', TRUE);
            defined('SESSION') or define('SESSION', session()->get('session'));
            defined('ADMIN_ID') or define('ADMIN_ID', $adminProfile['id']);
            defined('ADMIN_UUID') or define('ADMIN_UUID', $adminProfile['uuid']);
            // defined('DISTRICT_ID') or define('DISTRICT_ID', $adminProfile['district_id']);
        } else {
            defined('IS_ALIVE') or define('IS_ALIVE', FALSE);
            defined('ADMIN_ID') or define('ADMIN_ID', 'GUEST');
            defined('ADMIN_UUID') or define('ADMIN_UUID', 0);
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // ไม่มีการดำเนินการหลังจากการตอบสนอง
    }
}
