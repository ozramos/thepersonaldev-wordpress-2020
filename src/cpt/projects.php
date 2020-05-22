<?php

add_action('init', function () {
  register_taxonomy('project_tag', 'projects', [
    'labels' => [
      'name' => 'Tags',
      'singular_name' => 'Tag'
    ],
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'project-tag'],
    'show_in_rest' => true
  ]);

  register_post_type('tpd_project', [
    'labels' => [
      'name' => 'Projects',
      'singular_name' => 'Project'
    ],
    'description' => 'Used to detail your projects and portfolio items',
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJicmllZmNhc2UiIHJvbGU9ImltZyIgdmlld0JveD0iMCAwIDUxMiA1MTIiIGNsYXNzPSJzdmctaW5saW5lLS1mYSBmYS1icmllZmNhc2UgZmEtdy0xNiBmYS0zeCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0iZGlzcGxheTpibG9jaztmb250LXNpemU6NDhweDtoZWlnaHQ6NDhweDtsaW5lLWhlaWdodDo1NS4ycHg7bWluLWhlaWdodDphdXRvO21pbi13aWR0aDphdXRvO292ZXJmbG93LXg6dmlzaWJsZTtvdmVyZmxvdy15OnZpc2libGU7dmVydGljYWwtYWxpZ246LTZweDt3aWR0aDo0OHB4O3BlcnNwZWN0aXZlLW9yaWdpbjoyNHB4IDI0cHg7dHJhbnNmb3JtLW9yaWdpbjoyNHB4IDI0cHg7Ij48cGF0aCBmaWxsPSJjdXJyZW50Q29sb3IiIGQ9Ik0zMjAgMzM2YzAgOC44NC03LjE2IDE2LTE2IDE2aC05NmMtOC44NCAwLTE2LTcuMTYtMTYtMTZ2LTQ4SDB2MTQ0YzAgMjUuNiAyMi40IDQ4IDQ4IDQ4aDQxNmMyNS42IDAgNDgtMjIuNCA0OC00OFYyODhIMzIwdjQ4em0xNDQtMjA4aC04MFY4MGMwLTI1LjYtMjIuNC00OC00OC00OEgxNzZjLTI1LjYgMC00OCAyMi40LTQ4IDQ4djQ4SDQ4Yy0yNS42IDAtNDggMjIuNC00OCA0OHY4MGg1MTJ2LTgwYzAtMjUuNi0yMi40LTQ4LTQ4LTQ4em0tMTQ0IDBIMTkyVjk2aDEyOHYzMnoiIGNsYXNzPSIiIHN0eWxlPSJmb250LXNpemU6NDhweDtoZWlnaHQ6YXV0bztsaW5lLWhlaWdodDo1NS4ycHg7b3ZlcmZsb3cteDp2aXNpYmxlO292ZXJmbG93LXk6dmlzaWJsZTt3aWR0aDphdXRvO3BlcnNwZWN0aXZlLW9yaWdpbjowcHggMHB4O3RyYW5zZm9ybS1vcmlnaW46MHB4IDBweDtmaWxsOnJnYig3MywgODAsIDg3KTtkOnBhdGgoJnF1b3Q7TSAzMjAgMzM2IEMgMzIwIDM0NC44NCAzMTIuODQgMzUyIDMwNCAzNTIgSCAyMDggQyAxOTkuMTYgMzUyIDE5MiAzNDQuODQgMTkyIDMzNiBWIDI4OCBIIDAgViA0MzIgQyAwIDQ1Ny42IDIyLjQgNDgwIDQ4IDQ4MCBIIDQ2NCBDIDQ4OS42IDQ4MCA1MTIgNDU3LjYgNTEyIDQzMiBWIDI4OCBIIDMyMCBWIDMzNiBaIE0gNDY0IDEyOCBIIDM4NCBWIDgwIEMgMzg0IDU0LjQgMzYxLjYgMzIgMzM2IDMyIEggMTc2IEMgMTUwLjQgMzIgMTI4IDU0LjQgMTI4IDgwIFYgMTI4IEggNDggQyAyMi40IDEyOCAwIDE1MC40IDAgMTc2IFYgMjU2IEggNTEyIFYgMTc2IEMgNTEyIDE1MC40IDQ4OS42IDEyOCA0NjQgMTI4IFogTSAzMjAgMTI4IEggMTkyIFYgOTYgSCAzMjAgViAxMjggWiZxdW90Oyk7Ii8+PC9zdmc+',
    'rewrite' => [
      'slug' => 'projects'
    ],
    'supports' => ['title', 'excerpt', 'editor', 'thumbnail', 'page-attributes'],
    'taxonomies' => ['project_tag'],
    'has_archive' => 'project_tag',
    'show_in_rest' => true
  ]);
});