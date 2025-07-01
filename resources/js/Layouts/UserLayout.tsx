import ApplicationLogo from "@/Components/ApplicationLogo";
import { Head, Link } from "@inertiajs/react";
import { Button } from "@/components/ui/button";

const UserLayout = ({ children }: { children: React.ReactNode }) => {
    return (
        <div className="min-h-screen bg-gray-100">
        <Head title="User Dashboard" />
        <header className="bg-white shadow">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div className="flex items-center justify-between">
                <Link href="/">
                <ApplicationLogo className="h-10 w-auto" />
                </Link>
                <Button asChild>
                <Link href="/logout">Logout</Link>
                </Button>
            </div>
            </div>
        </header>
        <main className="py-10">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {children}
            </div>
        </main>
        </div>
    );
}

export default UserLayout;
