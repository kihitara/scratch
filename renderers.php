<?php
 
class theme_scratch_core_renderer extends core_renderer {

// --- Start of custom menu modifications --- //
 
    protected function render_custom_menu(custom_menu $menu) {

// Adds the "My Courses" drop down to the custom menu if user is
// logged in AND enrolled in some courses.

        $mycourses = $this->page->navigation->get('mycourses');
        if (isloggedin() && $mycourses && $mycourses->has_children()) {
            $branchlabel = get_string('mycourses');
            $branchurl   = new moodle_url('/course/index.php');
            $branchtitle = $branchlabel;
            $branchsort  = -7000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
            foreach ($mycourses->children as $coursenode) {
                $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
            }
        }

// Adds a login or logout button to the end of the custom menu.

        if (isloggedin()) {
            $branchlabel = get_string('logout');
            $branchurl   = new moodle_url('/login/logout.php');
            $branchtitle = $branchlabel;
            $branchsort = 10000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
        } else {
            $branchlabel = get_string('login');
            $branchurl   = new moodle_url('/login/index.php');
            $branchtitle = $branchlabel;
            $branchsort = 10000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
        }

// Adds the home button to the start of the custom menu.

        if (isloggedin()) {
            $branchlabel = get_string('home');
            $branchurl = new moodle_url('/index.php');
            $branchtitle = $branchlabel;
            $branchsort = -10000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
        } else {
            $branchlabel = get_string('home');
            $branchurl = new moodle_url('/index.php');
            $branchtitle = $branchlabel;
            $branchsort = -10000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
        }

// Adds the category and course drop down to custom menu.
        global $CFG;
        require_once($CFG->dirroot.'/course/lib.php');
         
        $branch = $menu->add(get_string('courses', 'theme_scratch'), null, null, -8000);
         
        $categorytree = get_course_category_tree();
        foreach ($categorytree as $category) {
            $this->add_category_to_custommenu($branch, $category);
        }

// Finishes the custom menu.

        return parent::render_custom_menu($menu);
    }


// Adds the call method add_category_to_custommenu for the category and course drop down menu.
    
    protected function add_category_to_custommenu(custom_menu_item $parent, stdClass $category) {
        $branch = $parent->add($category->name, new moodle_url('/course/category.php', array('id' =>  $category->id)));
        if (!empty($category->categories)) {
            foreach ($category->categories as $subcategory) {
                $this->add_category_to_custommenu($branch, $subcategory);
            }
        }
        if (!empty($category->courses)) {
            foreach ($category->courses as $course) {
                $branch->add($course->shortname, new moodle_url('/course/view.php', array('id' => $course->id)), $course->fullname);
            }
        }
    }

// --- End of custom menu modifications --- //

}