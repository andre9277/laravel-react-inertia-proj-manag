import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Create({ auth }) {
  return (
    <Authenticated
      user={auth.user}
      header={
        <div className="flex justify-between items-center">
          <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create new Project
          </h2>
        </div>
      }
    >
      <Head title="Projects" />
    </Authenticated>
  );
}
